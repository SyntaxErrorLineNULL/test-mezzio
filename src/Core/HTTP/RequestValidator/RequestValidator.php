<?php
/**
 * Author: SyntaxErrorLineNULL.
 */

declare(strict_types=1);

namespace SELN\App\Core\HTTP\RequestValidator;

use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestValidator
{

    public function __construct(private ValidatorInterface $validator) {}

    /**
     * @throws RequestValidatorException
     */
    public function validate(object $object): void
    {
        $violations = $this->validator->validate($object);
        if ($violations->count() > 0) {
            throw new RequestValidatorException($violations);
        }
    }
}