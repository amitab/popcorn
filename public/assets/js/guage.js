$(function ()  
				{
   $('#chartContainer').dxLinearGauge({
	scale: {
		startValue: 0, endValue: 10,
		majorTick: {
			color: '#ffffff',
			tickInterval: 2
		},
		label: {
			indentFromTick: -3
		}
	},
	rangeContainer: {
		offset: 10,
		ranges: [
			{ startValue: 0, endValue: 4, color: '#B25348' },
			{ startValue: 4, endValue: 7, color: '#E2FF71' },
			{ startValue: 7, endValue: 10, color: '#32FF23' }
		]
	},
	valueIndicator: {
		offset: 20
	},
	subvalueIndicator: {
		offset: -15
	},
	title: {
		text: 'Movie rating',
		font: { size: 36 }
	},
	value: 8.5,
	subvalues: [7, 9.2]
});
}

			);