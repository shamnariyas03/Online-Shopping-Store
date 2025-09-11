<?php
session_start();
include('./includes/connect.php');

// Form submission logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $insert_query = "INSERT INTO contact_messages (name, email, subject, message) 
                     VALUES ('$name', '$email', '$subject', '$message')";
    $result = mysqli_query($con, $insert_query);

    if ($result) {
        echo "<script>
                alert('✅ Thank you! Your message has been sent successfully.');
                window.location.href='index.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('❌ Error: Unable to send your message. Please try again later.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - MyShop</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: #f4f4f9;
    }
    .contact-header {
      background: linear-gradient(135deg, #6f42c1, #4332a8);
      color: white;
      padding: 50px 20px;
      text-align: center;
      animation: fadeInDown 1s ease;
    }
    .contact-card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      padding: 30px;
      background: white;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .contact-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    .contact-info i {
      font-size: 22px;
      color: #6f42c1;
      margin-right: 10px;
    }
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    .fade-in {
      animation: fadeIn 1s ease;
    }
    .btn-animated {
      transition: transform 0.2s ease, background 0.3s ease;
    }
    .btn-animated:hover {
      transform: scale(1.05);
      background: #4332a8;
      color: #fff;
    }
  </style>
</head>
<body>

<!-- Header -->
<div class="contact-header">
  <h1 class="fade-in">Contact Us</h1>
  <p class="fade-in">We’d love to hear from you! Get in touch with us.</p>
</div>

<!-- Contact Section -->
<div class="container my-5">
  <div class="row g-4">
    
    <!-- Contact Form -->
    <div class="col-md-7 fade-in">
      <div class="contact-card">
        <h4 class="mb-4">Send us a Message</h4>
        <form action="" method="post">
          <div class="mb-3">
            <label class="form-label">Your Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Your Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" rows="5" class="form-control" required></textarea>
          </div>
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary px-4 btn-animated">
              <i class="fa fa-paper-plane"></i> Send Message
            </button>
            <a href="index.php" class="btn btn-secondary px-4 btn-animated">
              <i class="fa fa-home"></i> Back to Home
            </a>
          </div>
        </form>
      </div>
    </div>

    <!-- Contact Info -->
    <div class="col-md-5 fade-in">
      <div class="contact-card contact-info">
        <h4 class="mb-4">Contact Information</h4>
        <p><i class="fa fa-map-marker-alt"></i> Dubai, UAE</p>
        <p><i class="fa fa-phone"></i> +971 50 123 4567</p>
        <p><i class="fa fa-envelope"></i> support@myshop.com</p>

        <hr>
        <h5>Find Us</h5>
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115896.28039866095!2d55.1556384!3d25.0757594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4341aaf54c29%3A0x9ffda2a3a3b0c7d3!2sDubai!5e0!3m2!1sen!2sae!4v1704800000000"
          width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>

  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>