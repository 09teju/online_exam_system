<?php
require('fpdf.php');
require_once 'config.php';

// Retrieve student_id and subject_name from URL parameters
$student_id = $_GET['student_id'];
$subject_name = $_GET['subject_name'];

// Fetch student details
$sql = "SELECT name FROM students WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$stmt->bind_result($student_name);
$stmt->fetch();
$stmt->close();

// Fetch the exam results
$sql_results = "SELECT exam_correct FROM results WHERE student_id = ? AND subject_name = ?";
$stmt_results = $conn->prepare($sql_results);
$stmt_results->bind_param("is", $student_id, $subject_name);
$stmt_results->execute();
$stmt_results->bind_result($exam_correct);
$stmt_results->fetch();
$stmt_results->close();

// Fetch the total number of questions
$sql_questions = "SELECT COUNT(*) as total_questions FROM exam_test_questions WHERE subject_name = ?";
$stmt_questions = $conn->prepare($sql_questions);
$stmt_questions->bind_param("s", $subject_name);
$stmt_questions->execute();
$result_questions = $stmt_questions->get_result();
$row_questions = $result_questions->fetch_assoc();
$total_questions = $row_questions['total_questions'];
$stmt_questions->close();

// Calculate the percentage
$percentage = ($exam_correct / $total_questions) * 100;

// Create a new PDF document
$pdf = new FPDF();
$pdf->AddPage();

// Set font for the title
$pdf->SetFont('Arial', 'B', 24);
$pdf->SetTextColor(0, 0, 255); // Blue color
$pdf->Cell(0, 20, 'Certificate of Completion', 0, 1, 'C');

// Line break
$pdf->Ln(20);

// Set font for the body text
$pdf->SetFont('Arial', '', 16);
$pdf->SetTextColor(0, 0, 0); // Black color
$pdf->MultiCell(0, 10, "This is to certify that", 0, 'C');

// Set font for student name
$pdf->SetFont('Arial', 'I', 20); // Italic font for cursive effect
$pdf->SetTextColor(255, 215, 0); // Gold color
$pdf->MultiCell(0, 10, "$student_name", 0, 'C');

// Reset font and color
$pdf->SetFont('Arial', '', 16);
$pdf->SetTextColor(0, 0, 0); // Black color
$pdf->MultiCell(0, 10, "has successfully completed the", 0, 'C');

// Set font for subject name
$pdf->SetFont('Arial', 'B', 20); // Bold font
$pdf->MultiCell(0, 10, "$subject_name", 0, 'C');

// Additional content
$pdf->SetFont('Arial', '', 16);
$pdf->MultiCell(0, 10, "test organized by TJDC organisation with course material provided.", 0, 'C');
$pdf->MultiCell(0, 10, "Passing an online exam, conducted remotely from, is a pre-requisite for completing this training.", 0, 'C');
$pdf->Ln(10);
$pdf->MultiCell(0, 10, "This training is offered by the TJDC organisation.", 0, 'C');
$pdf->Ln(10);

// Display score percentage
$pdf->SetFont('Arial', 'B', 16); // Bold font
$pdf->MultiCell(0, 10, "Score: 100%", 0, 'C');
$pdf->Ln(10);

// Additional information
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 10, "Credits for the TJDC courses are based on our estimates of the work required to complete them.", 0, 'C');

// Add a decorative border
$pdf->SetDrawColor(50, 60, 100);
$pdf->SetLineWidth(1);
$pdf->Rect(5, 5, 200, 287, 'D');

// Add the signature image
$pdf->Image('signature.png', 159, 183, 40); // Adjust the position and size as needed

// Set Y-coordinate for the "Signature of Authority" text
$pdf->SetY(200);
$pdf->SetX(200);
// Set font for the signature section
$pdf->SetFont('Arial', 'I', 12);
$pdf->SetTextColor(0, 0, 0); // Black color
$pdf->Cell(0, 10, 'Signature of Authority', 0, 1, 'R');

// Output the PDF
$pdf->Output('D', "Certificate_$subject_name.pdf");

$conn->close();
?>
