const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
// const isMobile = navigator.userAgentData.mobile;
if (!isMobile) {
  window.location.href = `/maps`;
}
