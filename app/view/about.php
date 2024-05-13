<div class="container-fluid">
    <?php
    $sections = [
        [
            'title' => 'Innovative Solutions',
            'description' => 'We provide innovative solutions to complex problems.',
            'modules' => ['Research', 'Development', 'Implementation', 'Support']
        ],
        [
            'title' => 'Expert Team',
            'description' => 'Our team consists of experts in various fields.',
            'modules' => ['Consulting', 'Planning', 'Execution', 'Review']
        ],
        [
            'title' => 'Customer Focus',
            'description' => 'We put our customers at the heart of everything we do.',
            'modules' => ['Customer Service', 'Customer Experience', 'Customer Success', 'Customer Loyalty']
        ],
        [
            'title' => 'Sustainable Practices',
            'description' => 'We are committed to sustainable practices in all our operations.',
            'modules' => ['Sustainability', 'Environment', 'Community', 'Future']
        ]
    ];

    foreach ($sections as $i => $section): ?>
        <div class="row">
            <div class="col-md-6">
                <div class="hero-text">
                    <h1><?= $section['title'] ?></h1>
                    <p><?= $section['description'] ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hero-modules">
                    <?php foreach ($section['modules'] as $module): ?>
                        <div class="module"><?= $module ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="row">
        <div class="col-md-12 mb-5 text-center">
            <a href="/login" class="btn btn-primary cta-button">Join Us</a>
        </div>
    </div>
</div>

<style>
    .hero-text {
        text-align: center;
        padding: 50px;
    }

    .hero-modules {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        height: 100%;
        padding: 50px;
    }

    .module {
        padding: 20px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .cta-button {
        transition: transform 0.3s ease-in-out;
    }

    .cta-button:hover {
        transform: scale(1.1);
    }

    .hero-text, .hero-modules {
        animation: fadeIn 2s;
    }

    @keyframes fadeIn {
        0% {opacity: 0;}
        100% {opacity: 1;}
    }
</style>