pipeline {
  agent any
  stages {
    stage('Test1') {
      parallel {
        stage('Test1') {
          steps {
            sh 'Echo Test1'
          }
        }
        stage('Test2') {
          steps {
            sh 'echo Test2'
          }
        }
      }
    }
    stage('Deploy') {
      steps {
        sh 'echo Deploy'
      }
    }
  }
}