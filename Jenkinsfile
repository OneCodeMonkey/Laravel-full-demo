pipeline {
    agent { docker 'php' }
    stages {
        stage('build') {
            steps {
                sh 'php --version'
                sh 'composer up -vvv'
                sh 'php artisan key:generate'
                sh '$WORKSPACE/vendor/bin/phpunit tests/Feature/OtherBasicTest.php'
            }
        }
    }
}