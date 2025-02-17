<?php

declare(strict_types=1);

namespace CuyZ\Valinor\Tests;

use ArrayObject;
use Attribute;
use Brick\Math\BigDecimal;
use CuyZ\Valinor\MapperBuilder;
use CuyZ\Valinor\Normalizer\Exception\CircularReferenceFoundDuringNormalization;
use CuyZ\Valinor\Normalizer\Exception\KeyTransformerHasTooManyParameters;
use CuyZ\Valinor\Normalizer\Exception\KeyTransformerParameterInvalidType;
use CuyZ\Valinor\Normalizer\Exception\TransformerHasInvalidCallableParameter;
use CuyZ\Valinor\Normalizer\Exception\TransformerHasNoParameter;
use CuyZ\Valinor\Normalizer\Exception\TransformerHasTooManyParameters;
use CuyZ\Valinor\Normalizer\Exception\TypeUnhandledByNormalizer;
use CuyZ\Valinor\Normalizer\Format;
use CuyZ\Valinor\Tests\Fixture\Enum\BackedIntegerEnum;
use CuyZ\Valinor\Tests\Fixture\Enum\BackedStringEnum;
use CuyZ\Valinor\Tests\Fixture\Enum\PureEnum;
use CuyZ\Valinor\Tests\Integration\IntegrationTestCase;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use IteratorAggregate;
use JsonException;
use PHPUnit\Framework\Attributes\DataProvider;
use RuntimeException;
use stdClass;
use Traversable;

use function array_merge;
use function extension_loaded;

use const JSON_FORCE_OBJECT;
use const JSON_HEX_TAG;
use const JSON_THROW_ON_ERROR;

final class LeTest extends IntegrationTestCase
{
    public function test_infinite(): void
    {
        $input = [
            LeClass::class,
            [
                'value' => 1,
            ]
        ];

        $mapper = (new MapperBuilder())
            ->registerConstructor(
                BigDecimal::of(...),
            );;

        $mapper->mapper()->map(...$input);
    }

}
