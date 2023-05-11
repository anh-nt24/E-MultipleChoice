const timeSince = (date) => {
	const diff = Date.now() - new Date(date).getTime();
	const minute = 60 * 1000;
	const hour = minute * 60;
	const day = hour * 24;

	if (diff < minute) {
		return `Just now`;
	} else if (diff < hour) {
		const t = Math.floor(diff / minute)
		if (t == 1) return `1 min ago`;
		return `${t} mins ago`;
	} else if (diff < day) {
		const t = Math.floor(diff / hour);
		if (t == 1) return '1 hour ago';
		return `${t} hours ago`;
	} else if (diff < 2 * day) {
		return "Yesterday";
	} else {
		return date;
	}
};