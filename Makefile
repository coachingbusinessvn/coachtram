## Edina Trâm V2 — Docker helpers
## Yêu cầu: Docker Desktop đang chạy
##
## Lệnh:
##   make up          Khởi động containers
##   make setup       Cài WP + seed toàn bộ data (lần đầu)
##   make seed        Chỉ chạy lại seed.php (không cài lại WP)
##   make export      Xuất SQL để import lên production
##   make down        Dừng containers
##   make reset       Xoá hoàn toàn, bắt đầu lại từ đầu
##   make logs        Xem log wordpress container

CLI = docker compose run --rm cli wp --allow-root --path=/var/www/html
COMPOSE = docker compose

.PHONY: up setup seed export down reset logs shell

up:
	$(COMPOSE) up -d
	@echo "🌐 http://localhost:8080 (chờ ~15s để WordPress khởi động)"

setup:
	$(COMPOSE) up -d
	@echo "⏳ Chờ containers sẵn sàng..."
	@sleep 10
	$(COMPOSE) run --rm cli sh /docker/setup.sh

seed:
	$(CLI) eval-file /docker/seed.php
	$(CLI) rewrite flush --hard
	@echo "✅ Seed hoàn tất"

export:
	$(COMPOSE) exec db mysqldump --no-tablespaces -uwp -pwp wordpress > docker/export/edina-tram-snapshot.sql
	@echo "✅ SQL đã xuất vào docker/export/edina-tram-snapshot.sql"

down:
	$(COMPOSE) down

reset:
	$(COMPOSE) down -v
	@echo "✅ Đã xoá toàn bộ volumes — chạy 'make setup' để bắt đầu lại"

logs:
	$(COMPOSE) logs -f wordpress

shell:
	$(COMPOSE) exec wordpress bash
