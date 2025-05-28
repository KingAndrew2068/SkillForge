<?php
      session_start();
      session_destroy();
      header("Location: /skillforge/index.php");
?>