pipeline {
    agent { docker 'php' }
    stages {
        stage('build') {
            steps {
                sh 'php --version'
                sh 'curl -sS https://getcomposer.org/installer | php'
                sh 'mv composer.phar /usr/local/bin/composer'
                sh 'composer up -vvv'
                sh 'php artisan key:generate'
                sh '$WORKSPACE/vendor/bin/phpunit tests/Feature/OtherBasicTest.php'
            }
        }
    }
}