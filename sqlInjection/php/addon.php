<html>
    <button id="btn">
        Congratulations!You have succeed!
    </button>

    <script>
        function event() {
            window.location.href("../php/test")
        }

        btn.addEventListener("click",event)
    </script>
</html>

<?php
    if ($num_results>1){
        echo "";
    }
