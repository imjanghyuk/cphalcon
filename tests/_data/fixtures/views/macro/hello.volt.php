<?php $this->macros['hello'] = function($__p = null) { if (isset($__p[0])) { $name = $__p[0]; } else { if (array_key_exists("name", $__p)) { $name = $__p["name"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'hello' was called without parameter: name");  } }  ?><?php return 'Hello ' . $name; ?><?php }; $this->macros['hello'] = \Closure::bind($this->macros['hello'], $this); ?><?= $this->callMacro('hello', ['World']) ?>