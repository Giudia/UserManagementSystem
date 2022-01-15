

<nav>
  <ul class="pagination justify-content-center">
    <li class="page-item <?= $page == 1? 'disabled' : '' ?>">
      <a class="page-link" href="<?="$url?page=".($page-1)?>" tabindex="-1" aria-disabled="true">Previous</a>
    </li>

    <?php for ($i=1; $i <= $numPages ; $i++):
      $class = $i == $page ? 'active disable': '';
      if ($class):
    ?>
      <li class="page-item <?=$class?>"><a class="page-link"><?=$i?></a></li>
    <?php else : ?>
      <li class="page-item"><a class="page-link" href="<?="$url?page=$i"?>"><?=$i?></a></li>
    <?php endif;
    endfor ?>

    <li class="page-item <?= $page == $numPages? 'disabled' : '' ?>">
      <a class="page-link" href="<?="$url?page=".($page+1)?>">Next</a>
    </li>
  </ul>
</nav>
