/**
 * Эта функция позволяет использовать localStorage.
 *
 * @template Type
 *
 * @param {string} name
 * @param {Type} [defaultItem]
 */
const useLocalStorage = (name, defaultItem) => {
  /** Получаем данные по ключю. */
  const getItem = localStorage.getItem(name);

  /**
   * Функция для изменения данных в localStorage.
   * @param {Type} newValue
   */
  const setItem = newValue => {
    localStorage.setItem(name, JSON.stringify(newValue));
  };

  /**
   * Если у ключа нет значения, то присваиваем ему
   * стандартное значение.
   */
  if (!getItem) {
    setItem(defaultItem);
  }

  return [getItem ? JSON.parse(getItem) : defaultItem, setItem];
};

const useCookies = () => {
  const get = name => {
    let matches = document.cookie.match(
      new RegExp(
        '(?:^|; )' +
          name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') +
          '=([^;]*)'
      )
    );
    return matches ? decodeURIComponent(matches[1]) : undefined;
  };

  function set(name, value, options = {}) {
    options = {
      path: '/',
      // при необходимости добавьте другие значения по умолчанию
      ...options,
    };

    if (options.expires instanceof Date) {
      options.expires = options.expires.toUTCString();
    }

    let updatedCookie =
      encodeURIComponent(name) + '=' + encodeURIComponent(value);

    for (let optionKey in options) {
      updatedCookie += '; ' + optionKey;
      let optionValue = options[optionKey];
      if (optionValue !== true) {
        updatedCookie += '=' + optionValue;
      }
    }

    document.cookie = updatedCookie;
  }

  function deleteCookie(name) {
    set(name, '', {
      'max-age': -1,
    });
  }

  return [get, set, deleteCookie];
};
