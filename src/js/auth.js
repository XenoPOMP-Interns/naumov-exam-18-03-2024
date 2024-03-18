const checkForStatus = () => {
  const [id, setId] = useLocalStorage('log-id', null);
  const [getCookie, setCookie, deleteCookie] = useCookies();

  const status = get('status');
  const userId = get('userId');

  const isTokenValid = () => {
    const token = get('token');
    const sessionToken = getCookie('sessionToken');

    return true;
  };

  if (status === '200' && typeof userId !== 'undefined' && isTokenValid()) {
    setId(userId);
    deleteCookie('sessionToken');
  }
};

const proceedAuthRedirect = options => {
  if (!options?.noStatusCheck) {
    checkForStatus();
  }

  const [id, setId] = useLocalStorage('log-id', null);

  // Пользователь не вошел, производим редирект/
  if (id === null) {
    innerNavigation(`/auth/login.php`);
  }
};

/**
 * Эта функция выходит из профиля.
 */
const logout = () => {
  const [id, setId] = useLocalStorage('log-id', null);
  const [getCookie, setCookie, deleteCookie] = useCookies();

  setId(null);
  deleteCookie('sessionToken');

  proceedAuthRedirect({ noStatusCheck: true });
};
