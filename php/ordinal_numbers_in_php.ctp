<div class="offset1 span10">
<h3>Ordinal Numbers in PHP Sample</h3>
<h4>Code:</h4>
<pre><code class='language-php'>
    &lt;?
    function output (){
      echo '&lt;tr&gt;';
      foreach (range(1, 100) as $number) {
        echo '&lt;td&gt;';
        echo ordinalize($number);
        echo '&lt;/td&gt;';
        if ($number % 10 == 0) {
          echo "&lt;/tr&gt;&lt;tr&gt;";
        }
      }
    }

    function ordinalize($num) {
        $suff = 'th';
        if ( ! in_array(($num % 100), array(11,12,13))){
            switch ($num % 10) {
                case 1:  $suff = 'st'; break;
                case 2:  $suff = 'nd'; break;
                case 3:  $suff = 'rd'; break;
            }
            return "{$num}{$suff}";
        }
        return "{$num}{$suff}";
    }
    ?&gt;

    &lt;table class='table'&gt;
      &lt;?php output();?&gt;
    &lt;/table&gt;
</code></pre>
<?php 

    function output (){
        echo '<tr>';
        foreach (range(1, 100) as $number) {
          echo '<td>';
          echo ordinalize($number);
          echo '</td>';
          if ($number % 10 == 0) {
            echo "</tr><tr>";
          }
        }
    }

    function ordinalize($num) {
        $suff = 'th';
        if ( ! in_array(($num % 100), array(11,12,13))){
            switch ($num % 10) {
                case 1:  $suff = 'st'; break;
                case 2:  $suff = 'nd'; break;
                case 3:  $suff = 'rd'; break;
            }
            return "{$num}{$suff}";
        }
        return "{$num}{$suff}";
    }

?>
<h4>Output:</h4>
<table class='table'>
  <?php output();?>
</table>
</div>
