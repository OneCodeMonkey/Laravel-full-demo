pipeline {
    agent { docker 'docker201904171/jenkinsci-docker:latest' }
    stages {
        stage('build') {
            steps {
                sh 'php --version'
                sh 'composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/'
                sh 'composer install --no-interaction --prefer-dist'
                sh 'cp .env.example .env'
                sh 'ls -lah'
                sh 'php artisan key:generate'
                sh '$WORKSPACE/vendor/bin/phpcs --standard=PSR2 -v app/'
                sh '$WORKSPACE/vendor/bin/phpstan analyse app/'
                sh '$WORKSPACE/vendor/bin/phpunit tests/'
            }
        }
    }
}