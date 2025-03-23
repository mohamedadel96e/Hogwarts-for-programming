<?php 
use Models\Quiz;

  $quizId = $_POST['quiz_id'];
  $studentId = $_POST['student_id'];
  $answer = $_POST['answer'] == 'true' ? 1 : 0;
  $houseId = $_POST['house_id'];

  $quizModel = new Quiz();
  $response = $quizModel->attemptQuiz($quizId, $studentId, $answer, $houseId);

  redirect('/dashboard');