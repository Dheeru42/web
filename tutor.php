<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>academicpluss - Your Gateway to Lifelong Learning</title>
    <link rel="shortcut icon" type="x-icon" href="pen.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .cont {
            text-align: center;
        }
        .container
        {
            background-color: aliceblue;
        }
    </style>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6505851856459439"
     crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require 'partial/_navh.php';
    ?>
    <div class="container">
        <header>
            <br>
            <b><u>
                    <h1 style="text-align: center;color:grey;">Meet Our Outstanding Experts</h1>
                </u></b>
        </header>
        <hr>
        <main>
            <b>
                <p><q>We are committed to providing our students with the best possible education, and our tutors play a vital role in achieving this goal. Our team of tutors is composed of highly qualified and experienced individuals who are passionate about teaching and helping students succeed.</q></p>
            </b>
            <br>
            <hr>
            <div class="cont">
                <section id="Deepak kumar">
                    <h2 style="text-align: center;color:dimgray;"><b><u>Deepak Kumar</u></b></h2>
                    <br>
                    <img src="deepak.jpg" alt="Deepak Kumar" width="200px" height="200px">
                    <br>
                    <br>
                    <b>
                        <p>Introducing our dedicated tutor, a distinguished graduate with a B.Tech degree from the renowned Kamla Nehru Institute of Technology (KNIT) in Sultanpur. Armed with a solid educational background, our tutor has seamlessly blended academic excellence with a passion for simplifying the complexities of mathematics and physics.

                            What sets this tutor apart is their extensive experience in contributing to various solution authoring websites. This journey has equipped them with a unique skill set to distill intricate concepts into easily understandable lessons. Their commitment to clarity and simplicity has garnered recognition, making them a trusted source for students seeking to excel in mathematics and physics.

                            In the realm of teaching, our tutor stands out for their exceptional methods. They have mastered the art of presenting challenging subjects in a way that resonates with students, fostering a deep understanding and appreciation for the material. The learning experience with our tutor goes beyond textbooks, creating an engaging and supportive environment for students to thrive.</p>
                    </b>
                </section>
            </div>
            <hr>
            <div class="cont">
                <section id="Mayank Azad">
                    <h2 style="text-align: center;color:dimgray;"><b><u>Mayank Azad</u></b></h2>
                    <br>
                    <img src="mayank.jpg" alt="Mayank Azad" width="200px" height="200px">
                    <br>
                    <br>
                    <b>
                        <p>Meet our exceptional tutor, a distinguished graduate with a Bachelor's degree in Technology in computer science engineering from the prestigious Indian Institute of Information Technology (IIIT) Kota. Their academic prowess is further underscored by their remarkable achievement of securing an outstanding rank in both IIT JEE Mains and Advanced examinations.

                            Beyond their academic accomplishments, our tutor brings a wealth of practical expertise to the table. With a seasoned background in crafting solutions, they have contributed significantly to various authoring websites, showcasing a commitment to sharing knowledge and providing clear, comprehensive explanations.</p>
                    </b>
                </section>
            </div>
            <hr>
            <div class="cont">
                <section id="Satyansh">
                    <h2 style="text-align: center;color:dimgray;"><b><u>Satyansh</u></b></h2>
                    <br>
                    <img src="satyansh.jpg" alt="Satyansh" width="200px" height="200px">
                    <br>
                    <br>
                    <b>
                        <p>Meet our exceptional tutor, a brilliant mind with a B.Tech degree in electronics and communication from the prestigious Indian Institute of Technology (IIT) Goa. Their academic journey is marked by not only a strong educational foundation but also an outstanding achievement in securing a commendable rank in both IIT JEE Mains and Advanced exams.In the realm of mathematics and physics, our tutor stands out for their unparalleled ability to teach with clarity and simplicity. They have developed the best methods to unravel the intricacies of these subjects, ensuring that students not only grasp challenging concepts but also find joy and confidence in their understanding.</p>
                    </b>
                </section>
            </div>
            <hr>
            <div class="cont">
                <section id="diversity">
                    <u><b>
                            <h2>Diversity and More Tutors</h2>
                        </b></u>
                    <b>
                        <p>Our tutor team is diverse and vibrant, with tutors from a variety of backgrounds and with expertise in a wide range of subjects. We believe that this diversity enriches the learning experience for our students, as it exposes them to different perspectives and teaching styles.</p>
                    </b>
                    <b>
                        <p>We encourage you to explore the profiles of our other tutors to find the perfect one for your needs. Each tutor has a unique expertise and approach, so you are sure to find one who can help you achieve your academic goals.</p>
                    </b>
                </section>
                <hr>
                <section id="call-to-action">
                    <u><b>
                            <h2>Experience Educational Excellence</h2></u></b>
                    <b>
                        <p>Join our platform today and experience the best results from our exceptional tutors. We offer a variety of tutoring services to meet the needs of all students, and our tutors are committed to helping you succeed.</p>
                    </b>
                    <br>
                    <a href="q1.php" class="btn btn-outline-info">Ask Expert</a>
                </section>
        </main>
    </div>
    </div>
    <?php
    echo '<hr>';
    require '_footer2.php'
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>