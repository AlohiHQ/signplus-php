<?php

declare(strict_types=1);

namespace Signplus\Utils;

/**
 * LineDecoder handles splitting streaming response chunks into lines.
 * It buffers incomplete lines and returns them when the next chunk arrives.
 */
class LineDecoder
{
  private string $lineBuffer = '';

  /**
   * Splits the given chunk into lines.
   * Stores incomplete lines in a buffer and returns them when the next chunk arrives.
   *
   * @param string $chunk The chunk to split
   * @return array<string> Array of complete lines
   */
  public function splitLines(string $chunk): array
  {
    $this->lineBuffer .= $chunk;
    $lines = [];

    // Split by newline characters, keeping the delimiter
    $parts = preg_split('/(\r\n|\n|\r)/', $this->lineBuffer, -1, PREG_SPLIT_DELIM_CAPTURE);

    // The last part is an incomplete line, so it becomes the new buffer.
    $this->lineBuffer = array_pop($parts) ?? '';

    // Combine the line content with its delimiter
    for ($i = 0; $i < count($parts); $i += 2) {
      $line = ($parts[$i] ?? '') . ($parts[$i + 1] ?? '');
      if (trim($line) !== '') {
        $lines[] = $line;
      }
    }

    return $lines;
  }

  /**
   * Returns the remaining lines in the buffer.
   *
   * @return array<string> Array of remaining lines
   */
  public function flush(): array
  {
    if (strlen($this->lineBuffer) === 0) {
      return [];
    }

    $lines = [$this->lineBuffer];
    $this->lineBuffer = '';
    return $lines;
  }
}
