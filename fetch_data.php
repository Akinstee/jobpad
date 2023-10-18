<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Include your database connection and queries
include("db_connect.php");

// Initialize variables
$totalJobPostings = 0;
$totalJobApplications = 0;
$companyOverview = "";
$recentApplicants = [];
$recentNotifications = [];
$activeJobPostings = 0;

// SQL queries
$queryTotalJobPostings = "SELECT COUNT(*) AS total_job_postings FROM job_posts";
$queryTotalJobApplications = "SELECT COUNT(*) AS total_job_applications FROM job_applications";
$queryCompanyOverview = "SELECT description FROM company WHERE company_id = $company_id"; // Replace with your company ID
$queryRecentApplicants = "SELECT applicant_fullname FROM applicants ORDER BY created_at DESC LIMIT 5";
$queryRecentNotifications = "SELECT job_title FROM job_posts WHERE job_post_id IN (SELECT job_post_id FROM job_applications) ORDER BY posting_date DESC LIMIT 5";
$queryActiveJobPostings = "SELECT COUNT(*) AS active_job_postings FROM job_posts WHERE is_approve = 'active'";

// Fetch data from the database
$totalJobPostings = $pdo->query($queryTotalJobPostings)->fetchColumn();
$totalJobApplications = $pdo->query($queryTotalJobApplications)->fetchColumn();
// $companyOverview = $pdo->query($queryCompanyOverview)->fetchColumn();
$queryCompanyOverview = "SELECT description FROM company WHERE company_id = :company_id";
$stmt = $pdo->prepare($queryCompanyOverview);
$stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
$stmt->execute();
$companyOverview = $stmt->fetchColumn();


// Fetch the company name from the database
// $queryCompanyName = "SELECT fullname FROM company WHERE company_id = $company_id"; // Replace with your company ID
// $companyName = $pdo->query($queryCompanyName)->fetchColumn();
$queryCompanyName = "SELECT fullname FROM company WHERE company_id = :company_id";
$stmt = $pdo->prepare($queryCompanyName);
$stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
$stmt->execute();
$companyName = $stmt->fetchColumn();

$recentApplicants = $pdo->query($queryRecentApplicants)->fetchAll();
$recentNotifications = $pdo->query($queryRecentNotifications)->fetchAll();
$activeJobPostings = $pdo->query($queryActiveJobPostings)->fetchColumn();

// Pass the variables to the dashboard template
$templateVars = [
    'totalJobPostings' => $totalJobPostings,
    'totalJobApplications' => $totalJobApplications,
    'companyOverview' => $companyOverview,
    'recentApplicants' => $recentApplicants,
    'recentNotifications' => $recentNotifications,
    'activeJobPostings' => $activeJobPostings,
    'fullname' => $companyName, // Include the company name
];

// Include the HTML template
// require_once('dashboard.php');
?>
