<!DOCTYPE html>
<html>
    <head>
        <title>Payment Page</title>
        <!-- Add the Hosted Payment Pages JavaScript library to your page -->
        <script src="https://payments.worldpay.com/resources/hpp/integrations/embedded/js/hpp-embedded-integration-library.js"></script>
    </head>

    <body>
        <div>This is my payment page</div>

        <!-- Add a container for the Hosted Payment Pages iframe -->
        <div id="custom-html"></div>

        <!-- Use JavaScript to inject the iframe into the container -->
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                // Your custom options for injecting the iframe
                var customOptions = {
                    url: "{{ $paymentUrl}}", // Injected from the controller
                    type: 'iframe',
                    inject: 'onload',
                    target: 'custom-html',
                    accessibility: true,
                    debug: false,
                };

                // Initialize the library and pass options
                var libraryObject = new WPCL.Library();
                libraryObject.setup(customOptions);
            });
        </script>
    </body>
</html>
