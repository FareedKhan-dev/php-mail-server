<?php include('header.php') ?>
<?php include('client_and_server.php') ?>

<div class="container">
  <?php if (isset($server)) { ?>
    <h2>CLIENT INFORMATION</h2>
    <br>
    <?php foreach ($server as $key => $value) { ?>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"> <strong><?php echo ("$key"); ?>: </strong><?php echo ("$value"); ?></li>
      </ul>
    <?php } ?>
    <br>
    <a class="btn btn-primary" href="client.php" role="button">About Client</a>
    <a class="btn btn-primary" href="index.php" role="button">Homepage</a>
  <?php } elseif (isset($server) == null) { ?>

    <div class="container jumbotron text-center">
      <svg class="bi bi-lightning-fill " width="40" height="40" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M11.251.068a.5.5 0 01.227.58L9.677 6.5H13a.5.5 0 01.364.843l-8 8.5a.5.5 0 01-.842-.49L6.323 9.5H3a.5.5 0 01-.364-.843l8-8.5a.5.5 0 01.615-.09z" clip-rule="evenodd" />
      </svg>
      <hr>
      <h4><?php echo ("Sorry, We didn't find information related to this server.") ?></h4> <br>
      <a class="btn btn-primary" href="client.php" role="button">About Client</a>
      <a class="btn btn-primary" href="index.php" role="button">Homepage</a>


    </div>
  <?php } ?>
</div>