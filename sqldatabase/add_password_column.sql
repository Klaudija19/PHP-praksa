-- Migration: Add password column to app_users table
-- Run this SQL script if the password column doesn't exist in your app_users table

-- Check and add password column if it doesn't exist
ALTER TABLE `app_users` 
ADD COLUMN IF NOT EXISTS `password` VARCHAR(255) NULL AFTER `email`;

-- Make password NOT NULL if needed (uncomment the line below)
-- ALTER TABLE `app_users` MODIFY `password` VARCHAR(255) NOT NULL;

-- If you need to remove the name column requirement (since registration only uses email and password)
-- ALTER TABLE `app_users` MODIFY `name` VARCHAR(255) NULL;



