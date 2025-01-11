<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Share API Example</title>
</head>
<body>
    <button id="shareButton">Share</button>

    <script>
        // Check if the Web Share API is supported
        if (navigator.share) {
            const shareButton = document.getElementById('shareButton');

            // Add click event listener to the share button
            shareButton.addEventListener('click', async () => {
                try {
                    // Define the data to be shared
                    const shareData = {
                        title: 'Example Title',
                        text: 'Check out this cool content!',
                        url: 'https://example.com'
                    };

                    // Share the data
                    await navigator.share(shareData);
                    console.log('Shared successfully!');
                } catch (error) {
                    console.error('Error sharing:', error);
                }
            });
        } else {
            // Web Share API is not supported, provide fallback
            console.log('Web Share API is not supported.');
            // You can provide a fallback sharing method here
        }
    </script>
</body>
</html>
