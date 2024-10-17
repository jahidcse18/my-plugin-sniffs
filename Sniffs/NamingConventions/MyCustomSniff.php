<?php

namespace MyPlugin\Sniffs\NamingConventions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class MyCustomSniff implements Sniff {

    public function register() {
        return [T_FUNCTION]; // Register to check function definitions
    }

    public function process(File $file, $stackPtr) {
        $tokens = $file->getTokens();
        $functionName = $tokens[$stackPtr + 2]['content']; // Get function name

        // Example: Ensure function names start with "my_"
        if (strpos($functionName, 'my_') !== 0) {
            $error = 'Function name "%s" must start with "my_"';
            $file->addError($error, $stackPtr, 'InvalidFunctionName', [$functionName]);
        }
    }
}
