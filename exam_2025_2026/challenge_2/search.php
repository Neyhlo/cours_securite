<!DOCTYPE html>

<html>
  <head>
    <title>Search the web</title>
  </head>
  <body>
    <form id="search-form" method="POST">
      <label for="search-engine-select">Search engine to use:</label>
      <select id="search-engine-select" name="search-engine">
        <option value="https://www.google.com/search?q=">Google</option>
        <option value="https://html.duckduckgo.com/html?q=">DuckDuckGo</option>
        <option value="https://en.wikipedia.org/wiki/">Wikipedia</option>
      </select>
      <input type="text" id="search-query-input" name="search-query" placeholder="Search" />
    </form>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
<?php 
  $curl = curl_init($_POST['search-engine'] . urlencode($_POST['search-query'])); 
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($curl, CURLOPT_USERAGENT, 'SecurityCourse/0.0 (private proxy)');
?>
    <pre><?php var_dump($_POST['search-engine'] . urlencode($_POST['search-query'])); ?></pre>
    <iframe srcdoc="<?php echo str_replace('"', '&quot;', curl_exec($curl)) ?>" sandbox style="width: 100%; height: 800px;"></iframe>
<?php endif ?>
  </body>
</html>
