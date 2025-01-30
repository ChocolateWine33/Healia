<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="about.css">
<link rel="stylesheet" href="./Header-Footer/headerfooter.css">

	<title>My Page</title>

	<script>
		window.addEventListener('load', function() {
			var missionDiv = document.querySelector('.mission');
			var teamDiv = document.querySelector('.team');
			var whoWeAreDiv = document.querySelector('.ourpurpose');
			var windowHeight = window.innerHeight * 5.5;
			missionDiv.style.opacity = 1;
			window.addEventListener('scroll', function() {
				var missionDivTop = missionDiv.getBoundingClientRect().top;
				var teamDivTop = teamDiv.getBoundingClientRect().top + window.scrollY + (teamDiv.offsetHeight / 2);
				var whoWeAreDivTop = whoWeAreDiv.getBoundingClientRect().top + window.scrollY + (whoWeAreDiv.offsetHeight / 2);
				var scrollPosition = window.scrollY;
				if (scrollPosition > (teamDivTop - windowHeight / 4)) {
					teamDiv.style.opacity = 1;
				}
				if (scrollPosition > (whoWeAreDivTop - windowHeight / 2)) {
					whoWeAreDiv.style.opacity = 1;
				}
			});
		});
	</script>
</head>
<body>
	<?php include ('header.php')?>
	<div class="container">
		<div class="mission">
			<h2>Our Mission</h2>
			<p>Making professional therapy accessible, affordable, and convenient — so <br> 
			anyone who struggles with life's challenges can get help, anytime <br>
			and anywhere.</p>
		</div>

		<div class="ourpurpose">
			<h2>Our Purpose</h2>
			<p> "At our core, we believe that everyone deserves access to professional therapy, no matter who they are or where they come from. We recognize that mental health struggles can affect anyone, and we are committed to providing affordable, convenient, and accessible therapy services to those who need it most. We understand that seeking help can be difficult, and we strive to create a supportive and welcoming environment where individuals can feel safe and empowered to take the first step towards healing. Our mission is to break down the barriers that prevent people from receiving the mental health care they deserve, and to help our clients live happier, healthier lives.".</p>
		</div>

		<div class="team">
  <h2>Our Team</h2>
  <p>We are passionate and compassionate students, driven by the mission of helping more people live a better and happier life every day.</p>
  <div class="team-members"></div>
</div>
	</div>

<script>
  var teamMembers = [
    { name: 'Nada Sabry', title: 'Project Manager', image: './images/nada.jpg' },
    { name: 'Mohab Ghazal', title: 'Marketing Manager', image: './images/mohab.jpg' },
    { name: 'Mahmoud Hany', title: 'Business Analyst', image: './images/hany.jpg' },
    { name: 'Youssef Rawi', title: 'Software Engineer', image: './images/youssef.jpeg' },
	{ name: 'Bola Sherif ', title: 'Business Analyst', image: './images/bola.jpg' },
    { name: 'Marwan Gamal', title: 'Software Engineer', image: './images/marwan.jpg' }
  ];

  var teamMembersContainer = document.querySelector('.team-members');

  teamMembers.forEach(function(member) {
    var memberHTML = `
      <div class="team-member">
        <img src="${member.image}" alt="${member.name}">
        <h3>${member.name}</h3>
        <p>${member.title}</p>
      </div>
    `;
    teamMembersContainer.insertAdjacentHTML('beforeend', memberHTML);
  });
</script>
<?php include ('./Header-Footer/footer.php')?>
</body>
</html>