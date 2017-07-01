<?php
while (fscanf(STDIN, "%d%d", $a, $b) == 2) {
    printf("%d\n",$a+$b);
}