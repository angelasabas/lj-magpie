<?php
/*****************************************************************************
 Livejournal Magpie: Making Livejournal embedding easier.
 Copyright (c) by Angela Sabas
 http://scripts.indisguise.org

 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>.

 For more information please view the readme.txt file.
******************************************************************************/



/******************************************************************************
 The URL of the RSS feed of your livejournal
******************************************************************************/
$url = 'http://username.livejournal.com/data/rss';



/******************************************************************************
 DO NOT CHANGE ANYTHING BELOW THIS LINE AND ABOVE THE NEXT COMMENT LINE
******************************************************************************/
require_once( 'rss_fetch.inc' );
$rss = fetch_rss( $url );
foreach ($rss->items as $item) {
   @$href = $item['link'];
   @$title = $item['title'];
   @$entry = $item['description'];
   @$pubdate = $item['pubdate'];
   $dayshort = date( 'D', strtotime( $pubdate ) );
   $daylong = date( 'l', strtotime( $pubdate ) );
   $monshort = date( 'M', strtotime( $pubdate ) );
   $monlong = date( 'F', strtotime( $pubdate ) );
   $yy = date( 'y', strtotime( $pubdate ) );
   $yyyy = date( 'Y', strtotime( $pubdate ) );
   $m = date( 'n', strtotime( $pubdate ) );
   $mm = date( 'm', strtotime( $pubdate ) );
   $d = date( 'j', strtotime( $pubdate ) );
   $dd = date( 'd', strtotime( $pubdate ) );
   $dth = date( 'jS', strtotime( $pubdate ) );
   $ampm = date( 'a', strtotime( $pubdate ) );
   $AMPM = date( 'A', strtotime( $pubdate ) );
   $ap = rtrim( $ampm, 'm' );
   $AP = rtrim( $AMPM, 'm' );
   $min = date( 'i', strtotime( $pubdate ) );
   $_12h = date( 'g', strtotime( $pubdate ) );
   $_12hh = date( 'h', strtotime( $pubdate ) );
   $_24h = date( 'G', strtotime( $pubdate ) );
   $_24hh = date( 'H', strtotime( $pubdate ) );
   $reply = $href . '?mode=reply';
/******************************************************************************
 After the "?>" line below, write the template for your livejournal entries.
 This template will be applied to every entry in the RSS feed of your
 livejournal-- think of it as the text between the <Blogger></Blogger> tags
 (if you're familiar with blogger). The variable to use are in variables.txt
******************************************************************************/
?>

   <p>
   <b>@ <?= $daylong ?>, <?= $dth ?> of <?= $monlong ?>, year <?= $yyyy ?></b>:
   <i><?= $title ?></i>
   </p>

   <?= $entry ?>

   <p>
   <a href="<?= $reply ?>">Comment on this post?</a>
   </p>

   <br /><br />

<?php
/******************************************************************************
 DO NOT CHANGE ANYTHING BELOW THIS LINE AND DO NOT DELETE THE "<?php" LINE
 ABOVE THIS COMMENT.
******************************************************************************/
   }
echo '<p style="text-align: center;"><br />';
echo 'Powered by <a href="http://scripts.indisguise.org">Livejournal ' .
   'Magpie</a>.';
echo '</p>';
?>