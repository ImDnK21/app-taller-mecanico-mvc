<?php
class Utils {
  public static function isIdentity() {
    if (!isset($_SESSION['identity'])) {
      header('Location:' . APP_URL . 'usuario/login');
    } else {
      return true;
    }
  }

  public static function isAdmin() {
    if (!isset($_SESSION['admin'])) {
      header('Location:' . APP_URL);
    } else {
      return true;
    }
  }
}
