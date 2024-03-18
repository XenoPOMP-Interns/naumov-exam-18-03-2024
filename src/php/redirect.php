<?php

// Эта функция позволяет сделать редирект
function redirect($dest)
{
    header("Location: " . $dest);
}