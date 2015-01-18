from behave import *
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import BamDingWebTest
import time

use_step_matcher("re")


@given("we go to the home page")
def step_impl(context):
    """
    :type context behave.runner.Context
    """
    context.driver.get("http://localhost/wordpress")

@then("we are on the home page")
def step_impl(context):
    assert "sethalicious's Blog!" in context.driver.title


@step("we click on the menu dropdown")
def step_impl(context):
    """
    :type context behave.runner.Context
    """
    my_account = context.driver.find_element_by_id('menu-item-135')
    ActionChains(context.driver).move_to_element(my_account).click().perform()

@when('we click on "Dates"')
def step_impl(context):
    """
    :type context behave.runner.Context
    """
    dates = context.driver.find_element_by_id('menu-item-166')
    # ActionChains(context.driver).move_to_element(dates).click(dates).perform()

    actions = ActionChains(context.driver)
    actions.move_to_element(dates)
    actions.perform()
    actions.click(dates)
    actions.perform()


@then('we go to the "Dates" page')
def step_impl(context):
    """
    :type context behave.runner.Context
    """

    wait = WebDriverWait(context.driver, 10)
    wait.until(EC.title_contains('Dates'))
    url = context.driver.current_url
    assert url == 'http://localhost/wordpress/dates/'
    pass