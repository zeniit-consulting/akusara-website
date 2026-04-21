<?php

namespace App;

enum PortfolioCategory: string
{
	case WEBDESIGN = 'Web Design';
	case COMPANY = 'Company';
	case DASHBOARD = 'Dashboard';
	case ECOMMERCE = 'E-commerce';

	public function label(): string
	{
		return match ($this) {
			self::WEBDESIGN => 'Web Design',
			self::COMPANY => 'Company',
			self::DASHBOARD => 'Dashboard',
			self::ECOMMERCE => 'E-commerce',
		};
	}
}
