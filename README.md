# Filta Laravel Challenge

This repository was created for a challenge test from **Filta**. The test was focused on using a CMS like **Drupal**, but I completed both tasks using **Laravel** instead.

## 🚀 Prerequisites

- Ensure you have **Docker** installed on your system.
- Make sure the ports exposed in `docker-compose.yml` are **not in use** before running the project.

## 📦 Installation & Setup

1. **Start the project using Docker:**
   ```sh
   docker compose up --build -d
   ```
2. **Access the running container:**

```sh
docker exec -it laravel_filta_test bash
```

## 🖥️ Accessing the Application
The root path / is mainly for the first task.
For the second task, use the following credentials to log in:
Email: test@example.com
Password: password
To manage products (add, edit, remove), log in and navigate to the appropriate section.
To view public products, visit:
```sh http://localhost:{your-docker-port}/products/show-public ```sh
(Replace {your-docker-port} with the port specified in docker-compose.yml, e.g., localhost:81.)
## 📌 Notes
The seeder will automatically populate all the necessary data.
If you encounter any issues, ensure that Docker is running and that the ports are free before starting the container.

## 🛠 Troubleshooting
If you encounter any permission-related issues, run the following commands inside the container:
```sh
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```