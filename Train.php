<?php

namespace CleanCode;

class Train {

    const HEAD_SYMBOL = "H";
    const PASSENGER_SYMBOL = "P";
    const RESTAURANT_SYMBOL = "R";
    const CONTAINER_SYMBOL = "C";

    const HEAD_CONTENT = "HHHH";
    const PASSENGER_CONTENT = "0000";
    const RESTAURANT_CONTENT = "hThT";
    const EMPTY_CONTAINER = "____";
    const FILLED_CONTAINER = "^^^^";

    const VERTICAL_LINE_SEPARATOR = "|";
    const COLON_SEPARATOR = "::";
    const TRAIN_START = "<";

    private $trainConfigurationParameters;
    private $trainConfiguration;

    public function __construct($trainConfigurationParameters)
    {
        $this->trainConfigurationParameters = str_split($trainConfigurationParameters);
        $this->trainConfiguration = $this->initializeTrainConfiguration();
        $this->configureTrain();
    }

    public function initializeTrainConfiguration()
    {
        return $this->trainConfiguration = self::TRAIN_START
            .self::HEAD_CONTENT
            .self::COLON_SEPARATOR
            .self::VERTICAL_LINE_SEPARATOR;
    }

    public function configureTrain()
    {

        for ($index = 0; $index < sizeof($this->trainConfigurationParameters); $index++)
        {
            $trainElement = $this->trainConfigurationParameters[$index];

            $this->addATrainElement($trainElement);
            $this->addVerticalLineSeparatorIfParameterDifferentFromHeadContent($trainElement);
            $this->addSeparatorsIfIndexDifferentFromLastParameterIndex($index);
        }
    }

    public function addATrainElement($element)
    {
        switch($element)
        {
            case self::HEAD_SYMBOL:
                break;

            case self::PASSENGER_SYMBOL:
                $this->trainConfiguration .= self::PASSENGER_CONTENT;
                break;

            case self::RESTAURANT_SYMBOL:
                $this->trainConfiguration .= self::RESTAURANT_CONTENT;
                break;

            case self::CONTAINER_SYMBOL:
                $this->trainConfiguration .= self::EMPTY_CONTAINER;
                break;
        }
    }

    public function addSeparatorsIfIndexDifferentFromLastParameterIndex($index)
    {
        if (function_exists("array_key_last"))
        {
            if($index !== \array_key_last($this->trainConfigurationParameters))
                $this->trainConfiguration .= $this->trainConfiguration
                    .self::COLON_SEPARATOR
                    .self::VERTICAL_LINE_SEPARATOR;
        }
    }

    public function addVerticalLineSeparatorIfParameterDifferentFromHeadContent($parameter)
    {
        if ($parameter !== self::HEAD_SYMBOL)
        $this->trainConfiguration .= $this->trainConfiguration.self::VERTICAL_LINE_SEPARATOR;
    }

    public function print()
    {
        return $this->trainConfiguration;
    }

    public function fill()
    {
        if(!$this->hasEmptyContainer())
        {
            return false;
        }
        $this->trainConfiguration .= \preg_replace('/.'.self::EMPTY_CONTAINER.'/', self::FILLED_CONTAINER, $this->trainConfiguration, 1);
    }

    public function hasEmptyContainer()
    {
        return \in_array(self::EMPTY_CONTAINER, str_split($this->trainConfiguration));
    }
}