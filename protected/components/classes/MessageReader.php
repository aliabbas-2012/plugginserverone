<?php

Yii::import('system.cli.commands.MessageCommand');

class MessageReader extends MessageCommand {

    public $allowedContexts = array('app', 'url');

    public  function extractMessages($fileName, $translator) {
        $messages = parent::extractMessages($fileName, $translator);

        foreach ($messages as $context => $ignored)
            if (!in_array($context, $this->allowedContexts))
                unset($messages[$context]);

        return $messages;
    }

}
