<div style="text-align: center; padding: 20px; font-family: Arial, sans-serif;">
    <h1 style="color: #3498db;">Thank you for your purchase we love you better than your money !</h1>
    <p style="font-size: 20px;">You will be redirected soon. If not, click the link below.</p>

    <a href="/" style="display: inline-block; margin-top: 20px; padding: 10px 20px; color: #fff; background-color: #3498db; text-decoration: none; border-radius: 5px;">Click this link</a>

    <div class="loader" style="margin: 30px auto;"></div>
</div>

<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<?php
header('Refresh: 5; URL=/');
?>