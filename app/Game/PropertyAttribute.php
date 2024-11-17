<?php

namespace App\Game;

use ReflectionClass;
use ReflectionException;

trait PropertyAttribute
{
    /**
     * @throws ReflectionException
     */
    private function registerAttributes($class): void
    {
        $reflectionClass = new ReflectionClass($class);
        $properties = $reflectionClass->getProperties();

        foreach ($properties as $property) {
            $attributes = $property->getAttributes();
            foreach ($attributes as $attribute) {
                $attribute->newInstance()->validate($property->getValue($class));
            }
        }
    }

    /**
     * @throws ReflectionException
     */
    private function proxy(Object $object): object
    {
        $this->registerAttributes($object);

        return $object;
    }
}
