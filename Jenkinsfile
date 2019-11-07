Jenkinsfile (Declarative Pipeline)
pipeline {
    agent { docker 'php' }
    stages {
        stage('build') {
            steps {
                sh 'php --version'
                sh 'ls -lah'
                sh '$WORKSPACE/vendor/bin/phpunit tests/Feature/OtherBasicTest.php'
            }
        }
    }
}