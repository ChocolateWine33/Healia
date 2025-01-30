<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="script.js" defer></script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="./Header-Footer/headerfooter.css">
        <title>Healia</title>
    </head>
    <body>    

    <?php include ('header.php')?>

    <section class="get-started">
        <div class="happy-life-intro">
            You deserve a happy life
            We’ll help you get there.
            <a href="register.php"><button class="get-started-button"> Get Started</button></a>
        </div>
    </section>
    <main >
        <div class="join-our-community hidden">
            <div class="breaking-point">
                <h2>Join Our Community</h2>
                <h3>We believe there’s nothing more unstoppable than when people come together. We encourage you to share your knowledge, ask questions, participate in discussions and become an integral part of this little community. Together we can become better community leaders and provide our members with a much better experience.</h3>
                <h3>Pricing:  <b>$1500</b> </h3>  
                <a href="subplan.php"><button>Join</button></a>
            </div>

 

            <img class="heart-image" src="./images/community.jpg" alt="">
        </div>
        <div class="explore-helpful-videos hidden">
            <img src="./images/video.jpg" alt="">
            <div class="breaking-point">
                <h2>Explore Helpful Videos</h2>
                <h3>Don't forget to check out our helpful videos! Our video library is packed with informative content, including tutorials on how to use our platform and its advanced features. Whether you're new to our service or a seasoned user, we think you'll find these videos engaging and useful. Just head over to our video library section to get started. If you have any questions or feedback, don't hesitate to reach out to us.</h3>  
                <a href="video.php"><button>Explore</button></a>
            </div>
        </div>
        <div class="what-users-say hidden" id="whatusersay">
            <div class="breaking-point">
                <h2>See What Our Users Say</h2>
                <h3>we encourage you to take a look at the reviews that our users have left. Our users' feedback is very important to us, as it helps us improve our service and ensure that we're meeting the needs of our community. By reading the reviews, you'll get a sense of what our platform is all about, and you'll also see what other users have experienced while using our service. We hope that you find the reviews helpful, and if you have any questions or concerns, please don't hesitate to reach out to us.</h3>  
                <a href="viewfb.php"><button>Reviews</button></a>
            </div>
            <img src="./images/feedback.jpg" alt="feeback image">
        </div>



        <div class="see-our-patients ">
        <h2>See Who We Service</h2>
        <div class="our-patients">
            <div class="patient-card hidden">
                <h3>Teens</h3>
                <img src="./images/teeen.jpg" alt="">
            </div>
            <div class="patient-card hidden">
                <h3>Indviduals</h3>
                <img src="./images/indi.jpg" alt="">
            </div>
            <div class="patient-card hidden">
                <h3>Couples</h3>
                <img src="./images/couple1.jpg" alt="">
            </div>

        </div>
    </div>

    <div class="see-our-therapists hidden">
    <h2>See Our Therapists</h2>
    <a href="therapists.php"><button>Click Here!</button></a>   
    </div>

    </main>

    <?php include ('./Header-Footer/footer.php')?>




</pre>
        </div>
    </footer>

    <script defer>
        const get_started_button = document.querySelector('.get-started-button').addEventListener('click', () => window.location.replace('register.php'))

        const hiddenElements = document.querySelectorAll('.hidden')
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if(entry.isIntersecting){
                    entry.target.classList.add('show');
                }else{
                    entry.target.classList.remove('show')
                }
            })
        })

        hiddenElements.forEach((el) => { observer.observe(el)})


        

    </script>
</body>
</html>