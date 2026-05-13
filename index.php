<?php
$messageStatus = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $messageStatus = "✅ Thank you, $name! Your message has been received.";
    } else {
        $messageStatus = "❌ Please fill all fields correctly.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shivam Rajbhar | Developer Portfolio</title>
<meta name="description" content="Portfolio of Shivam Rajbhar – PHP, JavaScript, HTML, CSS developer building calculators and web tools.">

<style>
* { margin: 0; padding: 0; box-sizing: border-box; font-family: system-ui, sans-serif; }
body { background: #0f172a; color: #e5e7eb; line-height: 1.6; }
a { color: #38bdf8; text-decoration: none; }
section { padding: 80px 20px; max-width: 1200px; margin: auto; }
h1, h2, h3 { color: #f8fafc; }

header {
    position: fixed; top: 0; width: 100%;
    background: rgba(15, 23, 42, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid #1e293b;
    z-index: 1000;
}
.navbar {
    max-width: 1200px; margin: auto;
    padding: 15px 20px;
    display: flex; justify-content: space-between; align-items: center;
}
.logo { font-size: 1.3rem; font-weight: 700; color: #38bdf8; }
.nav-links a { margin-left: 20px; font-weight: 500; }

.hero {
    min-height: 100vh;
    display: flex; align-items: center; justify-content: center;
    text-align: center;
    background: radial-gradient(circle at top, #1e293b, #020617);
}
.hero-content { max-width: 900px; margin: auto; }
.hero img {
    width: 150px; height: 150px;
    border-radius: 50%;
    border: 4px solid #38bdf8;
    object-fit: cover;
    margin-bottom: 20px;
}
.hero h1 { font-size: 3rem; margin-bottom: 15px; }
.hero h1 span { color: #38bdf8; }
.hero p { font-size: 1.2rem; margin-bottom: 20px; }
.hero-buttons a {
    display: inline-block;
    padding: 12px 28px;
    border-radius: 999px;
    margin: 5px;
    font-weight: 600;
    transition: 0.3s;
}
.btn-primary { background: linear-gradient(135deg, #38bdf8, #6366f1); color: #020617; }
.btn-secondary { border: 1px solid #38bdf8; color: #38bdf8; }
.btn-secondary:hover { background: #38bdf8; color: #020617; }

.about {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}
.about-card {
    background: #020617;
    border: 1px solid #1e293b;
    border-radius: 16px;
    padding: 30px;
}

.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 25px;
}
.project-card {
    background: #020617;
    border: 1px solid #1e293b;
    border-radius: 16px;
    padding: 25px;
    transition: 0.3s;
}
.project-card:hover {
    transform: translateY(-8px);
    border-color: #6366f1;
}

.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}
.contact-card {
    background: #020617;
    border: 1px solid #1e293b;
    border-radius: 16px;
    padding: 30px;
}
.contact-info p { margin-bottom: 10px; }

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    background: #020617;
    border: 1px solid #1e293b;
    border-radius: 10px;
    color: #e5e7eb;
}
.contact-form button {
    margin-top: 15px;
    padding: 12px 25px;
    border-radius: 999px;
    border: none;
    background: linear-gradient(135deg, #38bdf8, #6366f1);
    color: #020617;
    font-weight: 600;
    cursor: pointer;
}

.social-box {
    max-width: 420px;
    margin: auto;
    background: #020617;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    text-align: center;
}
.social-box h3 {
    margin-bottom: 15px;
    color: #38bdf8;
}
.social-btn {
    display: block;
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    font-size: 16px;
    font-weight: bold;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    transition: 0.3s;
}
.social-btn:hover {
    transform: scale(1.03);
    opacity: 0.9;
}
.whatsapp { background: #25D366; }
.telegram { background: #0088cc; }
.call { background: #10b981; }
.email { background: #6366f1; }
.group { background: #f97316; }

footer {
    text-align: center;
    padding: 30px 20px;
    border-top: 1px solid #1e293b;
    background: #020617;
}

@media (max-width: 768px) {
    .about, .contact-grid { grid-template-columns: 1fr; }
    .hero h1 { font-size: 2.3rem; }
}
</style>
</head>
<body>

<header>
    <div class="navbar">
        <div class="logo">Shivam.dev</div>
        <nav class="nav-links">
            <a href="#about">About</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
            <a href="#connect">Connect</a>
        </nav>
    </div>
</header>

<section class="hero" id="home">
    <div class="hero-content">
        <img src="profile.png" alt="Shivam Rajbhar">
        <h1>Hi, I'm <span>Shivam Rajbhar</span></h1>
        <p>Full Stack Web Developer | PHP • JavaScript • HTML • CSS</p>
        <div class="hero-buttons">
            <a href="#projects" class="btn-primary">View Projects</a>
            <a href="#connect" class="btn-secondary">Connect Now</a>
        </div>
    </div>
</section>

<section id="about">
    <h2>About Me</h2>
    <div class="about">
        <div class="about-card">
            <h3>Who I Am</h3>
            <p>
                Main ek web developer hoon jo modern websites aur calculator apps banata hoon
                jaise Age Calculator, EMI Calculator, aur business tools using PHP, JavaScript,
                HTML aur CSS.
            </p>
        </div>
        <div class="about-card">
            <h3>What I Do</h3>
            <ul>
                <li>✔️ Single page & multi-page websites</li>
                <li>✔️ Calculator apps (Age, EMI, SIP, GST, BMI)</li>
                <li>✔️ PHP backend & form systems</li>
                <li>✔️ SEO-friendly & monetizable tools</li>
            </ul>
        </div>
    </div>
</section>

<section id="projects">
    <h2>My Projects</h2>
    <div class="projects-grid">
        <div class="project-card">
            <h3>Age Calculator App</h3>
            <p>Fast aur accurate age calculator web app.</p>
            <a href="Tools/Agecalculator.html">View Project →</a>
        </div>
        <div class="project-card">
            <h3>EMI Calculator Tool</h3>
            <p>Loan EMI aur interest breakdown calculator.</p>
            <a href="emi-calculator.html">View Project →</a>
        </div>
        <div class="project-card">
            <h3>Multi-Tool Calculator Website</h3>
            <p>SIP, GST, BMI, aur percentage calculators ka bundle.</p>
            <a href="multi-calculator.html">View Project →</a>
        </div>
    </div>
</section>

<section id="contact">
    <h2>Contact Me</h2>
    <div class="contact-grid">
        
        <div class="contact-card">
            <h3>Send a Message</h3>
            <?php if (!empty($messageStatus)) { echo "<p>$messageStatus</p>"; } ?>
            <form method="POST" class="contact-form">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>
</section>

<section id="connect">
    <h2 style="text-align:center; margin-bottom:30px;">Connect With Me</h2>
    <div class="social-box">
        <h3>📞 Contact & Join Us</h3>

        <a href="tel:+917266849748" class="social-btn call">📱 Call Me</a>
        <a href="mailto:ShivamRajbhar@proton.me" class="social-btn email">📧 Email Me</a>
        <a href="https://wa.me/917266849748?text=Hello%20Shivam%2C%20I%20want%20to%20connect%20with%20you." target="_blank" class="social-btn whatsapp">💬 Message on WhatsApp</a>
        <a href="https://chat.whatsapp.com/E93Xv45vHBcFHAAkhSe8hN" target="_blank" class="social-btn group">👥 Join WhatsApp Group</a>
        <a href="https://t.me/+_IVh3SvHWF4wMDdl" target="_blank" class="social-btn group">👥 Join Telegram Group</a>
    </div>
</section>

<footer>
    <p>© <?php echo date("Y"); ?> Shivam Rajbhar. All rights reserved.</p>
</footer>

<script>
// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Fade-in animation
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = 1;
            entry.target.style.transform = "translateY(0)";
        }
    });
}, { threshold: 0.2 });

document.querySelectorAll('section, .project-card, .about-card, .social-box').forEach(el => {
    el.style.opacity = 0;
    el.style.transform = "translateY(40px)";
    el.style.transition = "all 0.6s ease";
    observer.observe(el);
});
</script>

</body>
</html>