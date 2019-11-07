pipeline {
    agent { docker 'php' }
    stages {
        stage('build') {
            steps {
                sh 'php --version'
                sh "php -r \"copy('https://install.phpcomposer.com/installer', 'composer-setup.php');\""
                sh 'php composer-setup.php'
                sh 'mv composer.phar /usr/local/bin/composer'
                sh "php -r \"unlink('composer-setup.php');\""
                sh 'composer install --optimize-autoloader --no-dev'
                sh 'php artisan key:generate'
                sh '$WORKSPACE/vendor/bin/phpunit tests/Feature/OtherBasicTest.php'
            }
        }
    }
}