<?php

final class PHUISegmentBarSegmentView extends AphrontTagView {

  private $width;
  private $color;
  private $position;

  public function setWidth($width) {
    $this->width = $width;
    return $this;
  }

  public function getWidth() {
    return $this->width;
  }

  public function setColor($color) {
    $this->color = $color;
    return $this;
  }

  public function setPosition($position) {
    $this->position = $position;
    return $this;
  }

  protected function canAppendChild() {
    return false;
  }

  protected function getTagAttributes() {
    $classes = array(
      'phui-segment-bar-segment-view',
    );

    if ($this->color) {
      $classes[] = $this->color;
    }

    // Convert width to a percentage, and round it up slightly so that bars
    // are full if they have, e.g., three segments at 1/3 + 1/3 + 1/3.
    $width = 100 * $this->width;
    $width = ceil(100 * $width) / 100;
    $width = sprintf('%.2f%%', $width);

    $left = 100 * $this->position;
    $left = floor(100 * $left) / 100;
    $left = sprintf('%.2f%%', $left);

    return array(
      'class' => implode(' ', $classes),
      'style' => "left: {$left}; width: {$width};",
    );
  }

}
