/**
 * Эта функция переносит пользователя на новую страницу.
 * @param {string} link
 */
const innerNavigation = link => {
  window.location.href = formInnerPath(link);
};

/**
 * Создает внутренний путь для ссылок.
 * @param {string} link
 * @return {string}
 */
const formInnerPath = link => {
  const { protocol, hostname } = window.location;

  return `${protocol}//${hostname}${link.startsWith('/') ? link : `/${link}`}`;
};
