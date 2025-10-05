
ALTER TABLE `students`
  ADD COLUMN `password` VARCHAR(255) NULL AFTER `email`,
  ADD COLUMN `role` VARCHAR(32) NOT NULL DEFAULT 'user' AFTER `password`;

-- Optionally, seed default admin (email: admin, password: admin123)
-- php -r "echo password_hash('admin123', PASSWORD_DEFAULT).PHP_EOL;"
