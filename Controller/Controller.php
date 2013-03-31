<?php

/**
 * The main interface that every controller should implement
 */
 interface IController
 {
 	public function create($value='');
    public function update($value='');
    public function delete($value='');
    public function view();
 }

/**
 * The parent class that implements IController. Controller is inherited from all Controller classes.
 */
 abstract class Controller implements IController
 {
 	abstract public function create($value='');
    abstract public function update($value='');
    abstract public function delete($value='');
    abstract public function view();
 }

