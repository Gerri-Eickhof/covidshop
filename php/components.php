<?php
function inputElement($size, $input, $id, $placeholder, $label){
 $ele = "
        <div class=\"$size\">
            <input type=\"$input\" class=\"form-control\" id=\"$id\" placeholder=\"$placeholder\" aria-label=\"$label\">
        </div>
    ";
    echo $ele;
}

function buttonElement($btnid, $styleclass, $text, $name, $attr){
    $btn = "
        <button name='$name''$attr' class='$styleclass' id='$btnid'>$text</button>
        ";
    echo $btn;
}