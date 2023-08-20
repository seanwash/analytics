# Install Composer dependencies optimized for production
composer install --prefer-dist --optimize-autoloader --no-dev

# Perform extra tasks for your framework of choice
# (e.g. generate the framework cache)
# [...]
npm run build

# We do not want to deploy "dev" caches that were generated on our machine
# (because paths will be different on AWS Lambda).
php artisan config:clear

# Deploy
serverless deploy
serverless bref:cli -a "migrate --force"
